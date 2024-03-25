<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= "New Page"; ?></title>
</head>
<body>

<?php
  class SomeObject {
      protected $name;
      public function __construct(string $name) {
          $this->name = $name;
      }
      public function getObjectName() {
          return $this->name;
      }
  }

  interface ObjectHandler {
      public function handle(SomeObject $object): void;
      public function getName(): string;
  }

  class Object1Handler implements ObjectHandler {
      public function handle(SomeObject $object): void {
          echo "Handling object_1\n";
          // handle logic for object_1
      }

      public function getName(): string {
          return 'object_1';
      }
  }

  class Object2Handler implements ObjectHandler {
      public function handle(SomeObject $object): void {
          echo "Handling object_2\n";
          // handle logic for object_2
      }

      public function getName(): string {
          return 'object_2';
      }
  }

  class SomeObjectsHandler {
      private $handlers = [];

      public function __construct(array $handlers) {
          $this->handlers = $handlers;
      }

      public function handleObjects(array $objects): void {
          foreach ($objects as $object) {
              foreach ($this->handlers as $handler) {
                  if ($object->getObjectName() === $handler->getName()) {
                      $handler->handle($object);
                  }
              }
          }
      }
  }

  $objects = [
      new SomeObject('object_1'),
      new SomeObject('object_2')
  ];

  $handlers = [
      new Object1Handler(),
      new Object2Handler()
  ];

  $soh = new SomeObjectsHandler($handlers);
  $soh->handleObjects($objects);
?>


</body>
</html>

