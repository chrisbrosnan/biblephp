<?php 

namespace CBrosnan\BiblePhp;

use CBrosnan\BiblePhp\Rendering\RenderContent;
use CBrosnan\BiblePhp\ApiHelpers\Helpers;

class BibleClient
{    
    /**
     * [getAvailableTranslations] Get a list of available translations from the Bible API.
     * 
     * @return array An associative array of available translations.
     */
    public static function getAvailableTranslations(): array
    {
        return Helpers::getAvailableTranslations();
    }

    /**
     * [getBooks] Get all books of the Bible for a specific translation.
     * 
     * @param string $translation The translation code (e.g., 'KJV').
     * @return array An associative array of books in the specified translation.
     */
    public static function getBooks($translation): array
    {
        return Helpers::getBooks($translation);
    }

    /**
     * [getChapter] Get a specific chapter from the Bible API.
     * 
     * @param string $translation The translation code (e.g., 'KJV').
     * @param string $book The book name (e.g., 'John').
     * @param int $chapter The chapter number.
     * @return array The chapter text as an array.
     */
    public static function getChapter($translation, $book, $chapter): array
    {
        return Helpers::getChapter($translation, $book, $chapter);
    }

    /**
     * [getCommentaries] Get available commentaries from the Bible API.
     * 
     * @return array An associative array containing commentaries.
     */
    public static function getCommentaries(): array
    {
        return Helpers::getCommentaries();
    }

    /**
     * [getCommentaryChapter] Get a specific chapter from a commentary in the Bible API.
     * 
     * @param string $commentary The commentary code (e.g., 'Matthew Henry').
     * @param string $book The book name (e.g., 'John').
     * @param int $chapter The chapter number.
     * @return array An associative array containing the commentary chapter text and related information.
     */
    public static function getCommentaryChapter($commentary, $book, $chapter): array
    {
        return Helpers::getCommentaryChapter($commentary, $book, $chapter);
    }

    /**
     * [getCommentaryProfiles] List all available commentary profiles from the Bible API.
     * 
     * @param string $commentary The commentary code (e.g., 'Matthew Henry').
     * @return array An associative array of available commentary profiles.
     */
    public static function getCommentaryProfiles($commentary): array
    {
        return Helpers::getCommentaryProfiles($commentary);
    }

    /**
     * [getCommentaryProfile] Get a specific commentary profile from the Bible API.
     * 
     * @param string $commentary The commentary code (e.g., 'Matthew Henry').
     * @param string $profile The profile code (e.g., 'John').
     * @return array An associative array containing the commentary profile text and related information.
     */
    public static function getCommentaryProfile($commentary, $profile): array
    {
        return Helpers::getCommentaryProfile($commentary, $profile);
    }

    /**
     * [getDatasets] Get available datasets from the Bible API.
     * 
     * @return array An associative array containing datasets.
     */
    public static function getDatasets(): array
    {
        return Helpers::getDatasets();
    }

    /**
     * [getBooksInDataset] List all books of the Bible for a specific dataset.
     * 
     * @param string $dataset The dataset code (e.g., 'open-cross-ref').
     * @return array An associative array containing the books in the dataset.
     */
    public static function getBooksInDataset($dataset): array
    {
        return Helpers::getBooksInDataset($dataset);
    }

    /**
     * [getChapterInDataset] Get a specific chapter from a dataset in the Bible API.
     * 
     * @param string $dataset The dataset code (e.g., 'open-cross-ref').
     * @param string $book The book name (e.g., 'John').
     * @param int $chapter The chapter number.
     * @return array An associative array containing the dataset chapter text and related information.
     */
    public static function getChapterInDataset($dataset, $book, $chapter): array
    {
        return Helpers::getChapterInDataset($dataset, $book, $chapter);
    }

    /**
     * [getVerse] Get a specific verse from a chapter in the Bible API.
     * 
     * @param string $translation The translation code (e.g., 'KJV').
     * @param string $book The book name (e.g., 'John').
     * @param int $chapter The chapter number.
     * @param int $verse The verse number.
     * @return array An associative array containing the verse text and related information.
     */
    public static function getVerse($translation, $book, $chapter, $verse): array
    {
        return Helpers::getVerse($translation, $book, $chapter, $verse);
    }

    /**
     * [renderVerseContent] Render the content of a specific verse from a chapter in the Bible API.
     * 
     * @param array $verse_data An associative array containing the verse data.
     * @return string|null The rendered verse content as a string, or null if not available.
     */
    public static function renderVerseContent($verse_data): string | null
    {
        return RenderContent::renderVerseContent($verse_data);
    }

    /**
     * [renderChapterContent] Render the content of a specific chapter in the Bible API.
     * 
     * @param array $chapter An associative array containing the chapter data.
     * @return string The rendered chapter content as a string.
     */
    public static function renderChapterContent($chapter_data): string
    {
        return RenderContent::renderChapterContent($chapter_data);
    }
}