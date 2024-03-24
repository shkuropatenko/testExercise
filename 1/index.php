<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= "New Page"; ?></title>
</head>
<body>

<?php

  $array = [
    ['id' => 1, 'create' => "14.04.2023", 'title' => "array1"],
    ['id' => 4, 'create' => "09.02.2023", 'title' => "array4"],
    ['id' => 2, 'create' => "03.07.2023", 'title' => "array2"],
    ['id' => 1, 'create' => "22.04.2023", 'title' => "array1"],
    ['id' => 2, 'create' => "12.12.2023", 'title' => "array4"],
    ['id' => 3, 'create' => "04.04.2023", 'title' => "array3"]
  ];

  // Filtering unique records
  $uniqueArray = array_values(array_map("unserialize", array_unique(array_map("serialize", $array))));
  print_r($uniqueArray);

  // Sorting a multidimensional array
  usort($array, function($a, $b) {
      return $a['id'] <=> $b['id'];
  });

  // Filtering by conditions
  $idToFilter = 2;
  $filteredArray = array_filter($array, function($element) use ($idToFilter) {
      return $element['id'] == $idToFilter;
  });

  // Changing the Array Structure
  $transformedArray = array_column($array, 'id', 'title');

?>

<?php
  // Output of results
  echo "Sorting a multidimensional array by key 'id':\n";
  print_r($array);
  echo "\n";
?>
<br>
<hr>
<?php
  // Output of results
  echo "Filtering elements by condition (id = $idToFilter):\n";
  print_r($filteredArray);
  echo "\n";

?>
<br>
<hr>
<?php
  // Output of results
  echo "Changing the Array Structure:\n";
  print_r($transformedArray);
  echo "\n";
?>

</body>
</html>