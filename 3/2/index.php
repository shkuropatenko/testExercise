<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= "New Page"; ?></title>
</head>
<body>

<?php
  interface HttpService {
      public function request(string $url, string $method, array $options): void;
  }

  class XMLHttpService implements HttpService {
      public function request(string $url, string $method, array $options): void {
          echo "XML HTTP request sent\n";
      }
  }

  class Http {
      private $service;

      public function __construct(HttpService $service) {
          $this->service = $service;
      }

      public function get(string $url, array $options): void {
          $this->service->request($url, 'GET', $options);
      }

      public function post(string $url): void {
          $this->service->request($url, 'POST', []);
      }
  }
?>



</body>
</html>

