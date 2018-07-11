<?php
declare(strict_types=1);
namespace yii\i18n;

use yii\helpers\{FileHelper, Json};

/**
 * Represents a message source that stores translated messages in JSON files.
 */
class JsonMessageSource extends HierarchicalMessageSource {

  /**
   * @var string TODO !!! description
   */
  public $fileExtension = 'json';

  /**
   * Loads the message translation for the specified language and category.
   * @param string $messageFile string The path to message file.
   * @return string[] The message array, or an empty array if the file is not found or invalid.
   */
  protected function loadMessagesFromFile($messageFile): array {
    if (!is_file($messageFile)) return [];
    $messages = Json::decode(@file_get_contents($messageFile));
    if (!is_array($messages)) return [];
    return $this->enableNesting ? $this->flatten($messages) : $messages;
  }
}
