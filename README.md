# BiblePHP

Laravel/PHP wrapper for the free Bible API.

## Installation

```bash
composer require cbrosnan/biblephp
```

## Usage

```php
use CBrosnan\BiblePhp\BibleClient;

$translations = BibleClient::getAvailableTranslations();

$books = BibleClient::getBooks('kjv');

$chapter = BibleClient::getChapter('kjv', 'John', 3);
```

## Available Methods

- getAvailableTranslations()
- getBooks()
- getChapter()
- getCommentaries()
- getCommentaryChapter()
- getCommentaryProfiles()
- getCommentaryProfile()
- getDatasets()
- getBooksInDataset()
- getChapterInDataset()
- getChapterVerse()

## License

MIT
```