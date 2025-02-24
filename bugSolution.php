```php
function processData(array $data): array {
  $result = [];
  foreach ($data as $item) {
    if (isset($item['id'])) {
      //Using array_key_exists to check if the key already exists.
      if(array_key_exists($item['id'], $result)){
          //Handle collision, for example, append to an array
          $result[$item['id']][] = $item; 
      } else {
        $result[$item['id']] = $item;
      }
    } else {
      error_log('Missing id in data item: ' . json_encode($item));
    }
  }
  return $result;
}

$data = [
  ['id' => 1, 'name' => 'Item 1'],
  ['id' => 1, 'name' => 'Item 1 Duplicate'],
  ['name' => 'Item 2'],
  ['id' => 3, 'name' => 'Item 3']
];

$processedData = processData($data);
print_r($processedData);
```