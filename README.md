# Simple PHP Catcher

## Description

Simple PHP catcher, to store the elements of an HTTP request in a text file.

## Usage

```php
require_once("catcher.class.php");
$catcher = new SimpleCatcher("catch.txt", "https://www.example.com/");
$catcher->redirectOnCookie(); // Redirect if the 'rememberme' cookie is set

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $catcher->catch(); // catch the data in the file set in the constructor
    $catcher->setRememberCookie(); // set the rememberme cookie to redirect the user on new visit
    $catcher->redirect(); // Redirect the user on the URL set in the constructor (optional)
}
```

## Example

See the `example.php` file.

## Licence

Author:	Romain Garcia

Copyright 2019, Romain Garcia

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.