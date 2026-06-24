# BiblePHP

Laravel/PHP wrapper for the free Bible API.

## Installation

```bash
composer require chrisbrosnan/biblephp
```

## Usage

```php
use ChrisBrosnan\BiblePhp\BibleClient;
```

## Available Methods

- getAvailableTranslations()
- getBooks()
- getChapter()
- getCommentaries()
- getCommentaryChapter()
- getCommentaryProfiles()
- getDatasets()
- getBooksInDataset()
- getChapterInDataset()
- getVerse()
- renderVerseContent()
- renderChapterContent()

## Example of use for each method
```php
$translations = BibleClient::getAvailableTranslations();

// Params: translation
$books = BibleClient::getBooks('eng_kja'); 

$commentaries = BibleClient::getCommentaries();

// Params: commentary, book, chapter
$commentary_chapter = BibleClient::getCommentaryChapter('adam-clarke', 'GEN', 1);

// Params: commentary
$commentary_profiles = BibleClient::getCommentaryProfiles('adam-clarke');

$datasets = BibleClient::getDatasets();

// Params: dataset
$books_in_dataset = BibleClient::getBooksInDataset('open-cross-ref');

// Params: dataset, book, chapter
$chapter_in_dataset = BibleClient::getChapterInDataset('open-cross-ref', 'GEN' 1);

// Params: translation, book, chapter
$chapter = BibleClient::getChapter('kjv', 'LEV', 3);

// Params: translation, book, chapter, verse
$verse = BibleClient::getVerse('eng_kjv', 'GEN', 1, 1);

// Params: chapter
$chapter_content = BibleClient::renderChapterContent($chapter);

// Params: verse
$verse_render = BibleClient::renderVerseContent($verse);
```

## API Documentation
This package is a PHP wrapper for the [Free Use Bible API](https://bible.helloao.org/docs/). This API is completely free and open to use, and the documentation can give a good overview for how to access it either using this wrapper or otherwise.

## License

MIT