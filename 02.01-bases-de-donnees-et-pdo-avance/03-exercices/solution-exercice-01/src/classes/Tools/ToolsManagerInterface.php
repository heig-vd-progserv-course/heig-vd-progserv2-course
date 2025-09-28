<?php

namespace Tools;

interface ToolsManagerInterface {
    public function getTools(): array;
    public function addTool(Tool $tool): int;
    public function removeTool(int $id): bool;
}
