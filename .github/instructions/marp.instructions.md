---
description:
  Instructions when working with Marp presentations in this repository.
applyTo: "**/PRESENTATION.md"
---

# Marp guidelines

## General guidelines

- Maximum characters per slide is ~800 characters (including headings, text,
  code, comments, bullet points, etc.). This is approximately:
  - OR 10-12 lines of text (prose).
  - OR 15-20 lines of code with minimal text.
  - OR 6-8 lines of text + 10 lines of code.
- If a slide exceeds these limits, consider splitting it into multiple slides to
  maintain readability and engagement. Split content logically, ensuring each
  slide focuses on a single concept or closely related ideas using the following
  strategies:
  - Character count: if total content exceeds ~800 characters.
  - Text-heavy slides: if explanatory text exceeds ~100 words (excluding code).
  - Mixed content: when combining significant text (>80 words) and code
    examples.
  - Long lists: when bullet point lists exceed 5-6 items.
  - Multiple code blocks: when showing 2+ code examples (>8 lines each).
  - Complex explanations: when explaining 3+ distinct concepts on one slide.
- Split using the following format, ensuring clear titles and logical flow
  between slides:

  ```markdown
  # My presentation

  ## Content slide 1 (1)

  _Content of the first slide._

  ## Content slide 1 (2)

  _Content of the second slide, which is a continuation of the first slide._
  ```

## Slides separation

Slides are separated by headings. Each heading (from level 1 to 6) will create a
new slide. The content of the slide will be the content that follows the heading
until the next heading of the same or higher level.

Never use `---` to separate slides, except when a code snippet is too long and
needs to be split into multiple slides. In that case, use `---` to separate the
code snippets, but make sure to keep the same heading for all the slides that
are part of the same content.

**Correct**

```markdown
## Slide 1

Content here

## Slide 2

More content
```

**Wrong**

```markdown
## Slide 1

Content here

---

## Slide 2

More content
```

## Presentation from a course content

- When creating a presentation from a course content, always keep the same
  headings with the same structure as the original content (titles and levels).
  This will help to keep a clear structure and make it easier to navigate
  between the original content and the presentation:

  ```markdown
  <!-- README.md -->

  # My course content

  ## Introduction

  ### Subsection 1

  #### Subsection 1.1

  ## Another section
  ```

  ```markdown
  <!-- PRESENTATION.md -->

  # My course content

  ## Introduction

  ### Subsection 1

  #### Subsection 1.1

  ## Another section
  ```

- When creating a presentation from a course content, also keep all the
  objectives from the original content. This will help to keep a clear structure
  and make it easier to navigate between the original content and the
  presentation:

  ```markdown
  <!-- README.md -->

  # My course content

  ## Objectives

  - Objective 1
  - Objective 2
  ```

  ```markdown
  <!-- PRESENTATION.md -->

  # My course content

  ## Objectives

  - Objective 1
  - Objective 2
  ```
