---
description: Instructions when working with PlantUML files in this repository.
applyTo: "**/*.puml, **/*.plantuml"
---

# PlantUML guidelines

- Always use the `.puml` file extension for PlantUML files.
- Always state the name of the diagram explicitly after the `@startuml`
  directive, for example: `@startuml my-diagram-name`.
- When using actors or participants, use aliases to improve readability and
  maintainability of the diagrams. For example,
  `actor "Alice\n(user)" as alice`.
- Use `title` to give a clear and descriptive name to your diagrams.
