@component('mail::message')
# Code de Réinitialisation

Bonjour,

Votre code de réinitialisation est :

# **{{ $otp }}**

Ce code expirera dans 10 minutes.

Si vous n’avez pas demandé cette opération, ignorez simplement cet email.

Merci,<br>
**L’équipe Devaga**
@endcomponent
