<?php
namespace App\OpenApi;

use OpenApi\Attributes as OAT;

#[OAT\Info(
      title: 'API Habits Tracker',
      version: '1.0.0',
      description: 'API pour gérer les habitudes quotidiennes',
      contact: new OAT\Contact(
          name: 'Clément REA',
          email: 'clementrea7@gmail.com'
      )
  )]
  #[OAT\Server(url: 'http://localhost', description: 'Serveur de développement')]
  class ApiInfo
  {

  }