<?php 

namespace ChrisBrosnan\BiblePhp\Rendering;

class RenderContent
{
    /**
     * [renderVerseContent] Render the content of a specific verse from a chapter in the Bible API.
     * 
     * @param array $verseData An associative array containing the verse data.
     * @return string|null The rendered verse content as a string, or null if not available.
     */
    public static function renderVerseContent($verseData): string | null
    {
        try {
            if (!isset($verseData['content'][0])) {
                return null; // Return null if verse content is not available
            }

            $verseString = $verseData['content'][0] ?? null;

            return $verseString;
        } catch (\Exception $e) {
            return "Error rendering verse content: " . $e->getMessage();
        }
    }

    /**
     * [renderChapterContent] Render the content of a specific chapter in the Bible API.
     * 
     * @param array $chapterData An associative array containing the chapter data.
     * @return string The rendered chapter content as a string.
     */
    public static function renderChapterContent($chapterData): string
    {
        $verses = $chapterData['chapter']['content'] ?? null;
        
        $chapterString = "";
        if ($verses !== null) {
            foreach ($verses as $verse) {
                $chapterString .= "<span>" . self::renderVerseContent($verse) . "</br/></span>";
            }
        }
        
        // Return as HTML paragraph for better formatting in the browser and prevent being displayed as JSON in the browser or as a single line of text
        return "<p>{$chapterString}</p>";
    }
}