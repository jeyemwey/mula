# MuLa

MuLa is a simple library to translate strings over the language file. 

## Getting Started

To get started, simply include the files from the **classes**-folder.

```php
<?php
include "classes/MuLa.class.php";
include "classes/MuLaFileReader.class.php";
```

You might know the language preference of the client/visitor from a users database or from where ever. You may have your sources. Then, you'll construct the MuLa class with the link to your translation-file (Here German).

```php
$MuLa = new MuLa(
    MuLaFileReader::CSV("lang/de-de.csv", "|")
);
```

From now, you can load translated terms from your translation-file by using the `get()` method.

```php
echo $MuLa->get("Hello World")
```
 
If the string was found in your translation file, the `get()` method returns the translated file. Otherwise, it will return the original string.

## Supported file types

MuLa supports only a few file types at the moment. If the file type of your favor is not there right now, you can add the parser in the **MuLaFileReader**-class.

### CSV

CSV files can store strings and their translations using the following struct:

```csv
Original string|Translated string
Another original string|Another translated string
```

You can change the delimiter (here `|`) when calling the parser function.

The *MuLaFileReader* method `CSV` holds two arguments:

* **$path**: The path to the csv-file which holds your translations.
* **$delimiter**: The cutting character for CSV cells.

### JSON

JSON files can store strings and their translations using the following struct:

```json
[
	{
		"orig": "Hello World",
		"out": "Hallo Welt"
	},
	{
		"orig": "How is it going?",
		"out": "Wie geht es dir?"
	}
]
```

`orig` always shows the original string while `out` holds the translated string.

The *MuLaFileReader* method `JSON` holds one argument:

* **$path**: The path to the json-file which holds your translations.

## Docs

Docs generated with phpdox. You can find the docs under doc/html/index.xhtml.

## Contributing

You can contribute to the project by forking it and sending PRs. Please document your code as best as you can.
I'm  currently looking for other file-parsers, so if you've designed one, please don't hesitate to send it to me. :)