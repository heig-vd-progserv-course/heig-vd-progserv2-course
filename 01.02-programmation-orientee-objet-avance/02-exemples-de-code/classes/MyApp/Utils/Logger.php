<?php

namespace MyApp\Utils;

/**
 * Classe Logger pour journaliser les événements
 */
class Logger {
    private array $logs = [];

    public function info(string $message): void {
        $this->log('INFO', $message);
    }

    public function warning(string $message): void {
        $this->log('WARNING', $message);
    }

    public function error(string $message): void {
        $this->log('ERROR', $message);
    }

    private function log(string $level, string $message): void {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[{$timestamp}] [{$level}] {$message}";
        $this->logs[] = $logEntry;
        echo "📝 {$logEntry}\n";
    }

    public function getLogs(): array {
        return $this->logs;
    }

    public function getLogsByLevel(string $level): array {
        return array_filter($this->logs, function ($log) use ($level) {
            return strpos($log, "[{$level}]") !== false;
        });
    }
}
