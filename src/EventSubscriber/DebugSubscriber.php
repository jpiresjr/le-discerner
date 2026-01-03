<?php
// src/EventSubscriber/DebugSubscriber.php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class DebugSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 9999], // Alta prioridade
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $path = $request->getPathInfo();

        // Log apenas para rotas de dashboard para não poluir
        if (str_starts_with($path, '/dashboard')) {
            error_log('===============================');
            error_log('🚀 REQUEST INICIADA: ' . $path);
            error_log('🔗 URL Completa: ' . $request->getUri());
            error_log('🔑 Method: ' . $request->getMethod());
            error_log('📦 Content-Type: ' . $request->headers->get('Content-Type'));
            error_log('🔐 Authorization: ' . $request->headers->get('Authorization', 'NÃO ENCONTRADO'));
            error_log('🍪 Cookies: ' . json_encode($request->cookies->all()));
            error_log('📋 Todos headers:');

            foreach ($request->headers->all() as $name => $values) {
                if ($name === 'authorization' || $name === 'cookie') {
                    $value = is_array($values) ? implode(', ', $values) : $values;
                    error_log("   $name: " . substr($value, 0, 100) . (strlen($value) > 100 ? '...' : ''));
                }
            }
        }
    }
}
