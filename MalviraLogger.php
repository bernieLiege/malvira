<?php
class MalviraLogger {
    private string $logFile;

    public function __construct(string $filePath = "data/log_malvira.json") {
        $this->logFile = $filePath;
        if (!file_exists($this->logFile)) {
            file_put_contents($this->logFile, json_encode([]));
        }
    }

    public function log(string $userMessage, string $malviraResponse): bool {
        $entry = [
            "timestamp" => date("c"),
            "utilisateur" => $userMessage,
            "malvira" => $malviraResponse
        ];
        $logs = json_decode(file_get_contents($this->logFile), true);
        if (!is_array($logs)) $logs = [];
        $logs[] = $entry;
        return file_put_contents($this->logFile, json_encode($logs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) !== false;
    }

    public function getLogs(): array {
        return json_decode(file_get_contents($this->logFile), true);
    }
}
?>