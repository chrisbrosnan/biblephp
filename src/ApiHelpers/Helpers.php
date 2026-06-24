<?php

namespace CBrosnan\BiblePhp\ApiHelpers;

use GuzzleHttp\Client;

class Helpers
{
    private static string $baseUrl = 'https://bible.helloao.org/api';
    
    /**
     * [getAvailableTranslations] Get a list of available translations from the Bible API.
     * 
     * @return array An associative array of available translations.
     */
    public static function getAvailableTranslations(): array
    {
        $client = new Client();
        $response = $client->get(self::$baseUrl . '/available_translations.json');
        return json_decode($response->getBody(), true);
    }

    /**
     * [getBooks] Get all books of the Bible for a specific translation.
     * 
     * @param string $translation The translation code (e.g., 'KJV').
     * @return array An associative array of books in the specified translation.
     */
    public static function getBooks($translation): array
    {
        $client = new Client();
        $url = self::$baseUrl . "/{$translation}/books.json";
        $response = $client->get($url);
        return json_decode($response->getBody(), true);
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
        try {
            $client = new Client();
            $url = self::$baseUrl . "/{$translation}/{$book}/{$chapter}.json";
            $response = $client->get($url);
            $chapterData = json_decode($response->getBody(), true);

            if (!isset($chapterData['chapter']['content'])) {
                return [
                    'error' => 'Chapter not found',
                    'translation' => $translation,
                    'book' => $book,
                    'chapter' => $chapter
                ];
            }

            return $chapterData;
        } catch (\Exception $e) {
            return [
                'error' => 'An error occurred while fetching the chapter',
                'message' => $e->getMessage(),
                'translation' => $translation,
                'book' => $book,
                'chapter' => $chapter
            ];
        }
    }

    /**
     * [getCommentaries] Get available commentaries from the Bible API.
     * 
     * @return array An associative array containing commentaries.
     */
    public static function getCommentaries(): array
    {
        $client = new Client();
        $response = $client->get(self::$baseUrl . '/available_commentaries.json');
        return json_decode($response->getBody(), true);
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
        $client = new Client();
        $url = self::$baseUrl . "/c/${commentary}/${book}/${chapter}.json";
        $response = $client->get($url);
        return json_decode($response->getBody(), true);
    }

    /**
     * [getCommentaryProfiles] List all available commentary profiles from the Bible API.
     * 
     * @param string $commentary The commentary code (e.g., 'Matthew Henry').
     * @return array An associative array of available commentary profiles.
     */
    public static function getCommentaryProfiles($commentary): array
    {
        $client = new Client();
        $url = self::$baseUrl . "/c/${commentary}/profiles.json";
        $response = $client->get($url);
        return json_decode($response->getBody(), true);
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
        $client = new Client();
        $url = self::$baseUrl . "/c/${commentary}/profiles/${profile}.json";
        $response = $client->get($url);
        return json_decode($response->getBody(), true);
    }

    /**
     * [getDatasets] Get available datasets from the Bible API.
     * 
     * @return array An associative array containing datasets.
     */
    public static function getDatasets(): array
    {
        $client = new Client();
        $response = $client->get(self::$baseUrl . '/available_datasets.json');
        return json_decode($response->getBody(), true);
    }

    /**
     * [getBooksInDataset] List all books of the Bible for a specific dataset.
     * 
     * @param string $dataset The dataset code (e.g., 'open-cross-ref').
     * @return array An associative array containing the books in the dataset.
     */
    public static function getBooksInDataset($dataset): array
    {
        $client = new Client();
        $url = self::$baseUrl . "/d/${dataset}/books.json";
        $response = $client->get($url);
        return json_decode($response->getBody(), true);
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
        $client = new Client();
        $url = self::$baseUrl . "/d/${dataset}/${book}/${chapter}.json";
        $response = $client->get($url);
        return json_decode($response->getBody(), true);
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
        try {
            $getChapterData = self::getChapter($translation, $book, $chapter);
            $chapterContent = json_decode(json_encode($getChapterData['chapter']['content']), true);

            // Indexing starts at 0, so we need to subtract 1 from the verse number
            $verseIndex = $verse - 1;

            if (!isset($chapterContent[$verseIndex])) {
                return [
                    'error' => 'Verse not found',
                    'translation' => $translation,
                    'book' => $book,
                    'chapter' => $chapter,
                    'verse' => $verse
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => 'An error occurred while fetching the verse',
                'message' => $e->getMessage(),
                'translation' => $translation,
                'book' => $book,
                'chapter' => $chapter,
                'verse' => $verse
            ];
        }

        return $chapterContent[$verseIndex];
    }
}