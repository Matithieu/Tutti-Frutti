<?php

namespace App\Security;

use App\Repository\UserRepository;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\OAuth2ClientInterface;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class OauthGoogleAuthenticator extends OAuth2Authenticator
{

    use TargetPathTrait;

    private string $oauthClient = "google";

    public function __construct(private readonly ClientRegistry $clientRegistry, private readonly RouterInterface $router,private  readonly UserRepository $repository){


    }



    public function supports(Request $request): ?bool
    {
        dd($this);
        return "landing" === $request->attributes->get('__route') && $request->get("service") === $this->oauthClient;
    }

    public function authenticate(Request $request): SelfValidatingPassport
    {
        $accessToken = $this->fetchAccessToken($this->getClient());
        $ressourceOwner = $this->getRessourceOwnerFromCredentials($accessToken);
        $user = $this->getUserFromRessoucesOwner($ressourceOwner,$this->repository);
        if($user === null) $this->repository->oauthPersist($user);
        return new SelfValidatingPassport(new UserBadge($user->getUserIdentifier(),fn()=>$user),
        badges:
            [
                new RememberMeBadge()
            ]
        );

    }

    public function getUserFromRessoucesOwner(ResourceOwnerInterface $resourceOwner, UserRepository $repository){
        // logique pour verifier si l'utilisateur existe dans google
         $google_id  = $resourceOwner->getId();
         $google_email = $resourceOwner->toArray()["email_verified"];

        if($google_id && $google_email){
            return $repository->findByGoogleId($google_id);
        }

    }

    private function getRessourceOwnerFromCredentials(AccessToken $credentials): ResourceOwnerInterface {
        return $this->getClient()->fetchUserFromToken($credentials);
    }

    public function getClient(): OAuth2ClientInterface {
        return $this->clientRegistry->getClient($this->oauthClient);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
         $targetPath = $this->getTargetPath($request->getSession(),$firewallName);
         if($targetPath){
             return new RedirectResponse($targetPath);
         }
         return new RedirectResponse($this->router->generate('landing'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {

        if($request->hasSession()){
            $request->getSession()->set(SecurityRequestAttributes::AUTHENTICATION_ERROR,$exception);
        }
        return new RedirectResponse($this->router->generate("app_login"));
    }

    //    public function start(Request $request, AuthenticationException $authException = null): Response
    //    {
    //        /*
    //         * If you would like this class to control what happens when an anonymous user accesses a
    //         * protected page (e.g. redirect to /login), uncomment this method and make this class
    //         * implement Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface.
    //         *
    //         * For more details, see https://symfony.com/doc/current/security/experimental_authenticators.html#configuring-the-authentication-entry-point
    //         */
    //    }
}
