<?php

return [

    'title' => 'Mail Providers',
    'create' => 'Add Mail Provider',
    'edit' => 'Edit Mail Provider',
    'show' => 'View Mail Provider',
    'new' => 'New Mail Provider',

    'fields' => [
        'provider' => 'Provider',
        'account_name' => 'Account Name',
        'email' => 'Email Address',
        'password' => 'Password',
    ],

    'filter' => [
        'provider' => 'Search by provider',
        'account_name' => 'Search by account name',
        'email' => 'Search by email',
    ],

    'messages' => [
        'created' => 'Mail provider has been added successfully.',
        'updated' => 'Mail provider has been updated successfully.',
        'deleted' => 'Mail provider has been deleted successfully.',
    ],

    'notes' => [
        'password_hint' => 'Use an app-specific password for Gmail or Outlook.',
    ],

];
