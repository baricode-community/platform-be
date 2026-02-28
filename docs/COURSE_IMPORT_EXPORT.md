# Course Import/Export Feature Documentation

## Overview

The Course Import/Export feature allows you to easily manage courses in the Filament admin panel. You can export entire courses (including categories, lessons, and YouTube videos) as JSON files, and import courses from JSON files. This makes it easy to:

- Backup courses
- Transfer courses between environments
- Bulk manage course data
- Version control course content

## Quick Start

### Importing a Course

1. Navigate to the **Learning Management System → Courses** section in Filament
2. Click the **Import Course** button at the top of the page
3. Choose one of two options:
   - **File Upload**: Upload a JSON file containing the course data
   - **JSON Text**: Paste JSON data directly in the text area
4. Click **Import** and the course and all its nested data will be created/updated

### Exporting a Course

1. Navigate to the **Learning Management System → Courses** section
2. Click on the course you want to export
3. Click the **Export Course** button at the top right
4. The course will be downloaded as a JSON file with the format: `course-slug_YYYY-MM-DD_HHmmss.json`

## JSON Format Structure

### Complete Structure Example

```json
{
  "title": "Course Title",
  "description": "Course description",
  "slug": "course-slug",
  "is_published": true,
  "categories": [
    {
      "title": "Category Title",
      "description": "Category description",
      "order": 1,
      "is_published": true,
      "lessons": [
        {
          "title": "Lesson Title",
          "description": "Lesson description",
          "content": "Lesson content/body",
          "order": 1,
          "duration": 600,
          "is_published": true,
          "youtube_list": [
            {
              "youtube_url": "https://www.youtube.com/watch?v=VIDEO_ID",
              "title": "Video Title",
              "description": "Video description",
              "order": 1,
              "is_published": true
            }
          ]
        }
      ]
    }
  ]
}
```

## Field Reference

### Course Level

| Field | Type | Required | Description | Default |
|-------|------|----------|-------------|---------|
| `title` | string | ✓ | Course name | - |
| `description` | string | | Course description | Empty string |
| `slug` | string | | URL-friendly identifier | Auto-generated from title |
| `is_published` | boolean | | Publish status | false |
| `categories` | array | | Array of categories | - |

### Category Level

| Field | Type | Required | Description | Default |
|-------|------|----------|-------------|---------|
| `title` | string | ✓ | Category name | - |
| `description` | string | | Category description | Empty string |
| `order` | integer | | Display order/position | 0 |
| `is_published` | boolean | | Publish status | false |
| `lessons` | array | | Array of lessons | - |

### Lesson Level

| Field | Type | Required | Description | Default |
|-------|------|----------|-------------|---------|
| `title` | string | ✓ | Lesson name | - |
| `description` | string | | Lesson description | Empty string |
| `content` | string | | Lesson body content | Empty string |
| `order` | integer | | Display order | 0 |
| `duration` | integer | | Duration in seconds | 0 |
| `is_published` | boolean | | Publish status | false |
| `youtube_list` | array | | Array of YouTube videos | - |

### YouTube Video Level

| Field | Type | Required | Description | Default |
|-------|------|----------|-------------|---------|
| `youtube_url` | string | ✓ | Full YouTube URL | - |
| `title` | string | | Video title | Empty string |
| `description` | string | | Video description | Empty string |
| `order` | integer | | Display order | 0 |
| `is_published` | boolean | | Publish status | false |

## Minimal Example

If you only want to provide required fields:

```json
{
  "title": "My Course",
  "categories": [
    {
      "title": "Module 1",
      "lessons": [
        {
          "title": "First Lesson",
          "youtube_list": [
            {
              "youtube_url": "https://www.youtube.com/watch?v=dQw4w9WgXcQ"
            }
          ]
        }
      ]
    }
  ]
}
```

## Important Notes

### Data Handling

- **Required fields**: If any required field is missing, the import will fail with an error message
- **Optional fields**: If not provided, they default to empty strings or `false` for booleans
- **Auto-generation**: The `slug` field is automatically generated from the title if not provided
- **Updates**: If a course with the same slug already exists, it will be updated instead of duplicated
- **Timestamps**: `created_at` and `updated_at` are handled automatically by the system

### Ordering

- The `order` field controls the display position in lists
- Use numeric values (0, 1, 2, etc.) for proper sorting
- Items are ordered by the `order` field in ascending order

### Duration

- Duration should be specified in **seconds**
- Examples:
  - 300 = 5 minutes
  - 600 = 10 minutes
  - 1800 = 30 minutes
  - 3600 = 1 hour

### YouTube URLs

- Use the full YouTube URL format
- Valid formats:
  - `https://www.youtube.com/watch?v=VIDEO_ID`
  - `https://youtu.be/VIDEO_ID`
- The system will store the URL as provided

### File Upload Limits

- Maximum file size: As per your server configuration
- Accepted format: JSON only (`.json` files)
- Files are automatically deleted after successful import

## Use Cases

### 1. Backup a Course
```bash
# From Filament: Click "Export Course" on any course
# This creates a timestamped JSON backup
```

### 2. Transfer Course Between Environments
```bash
# Export from production
# Import into staging/development
```

### 3. Bulk Create Courses from Template
```bash
# Create a course JSON template
# Duplicate and modify for each course
# Import them all one by one
```

### 4. Version Control
```bash
# Keep course JSONs in git
# Track changes to course structure
# Easy rollback if needed
```

## Error Handling

If something goes wrong during import, you'll see an error message with details:

| Error | Cause | Solution |
|-------|-------|----------|
| "Course title is required" | Missing title field | Add a `title` field to the course |
| "Category title is required" | Missing category title | Add `title` to each category |
| "Lesson title is required" | Missing lesson title | Add `title` to each lesson |
| "YouTube URL is required" | Missing youtube_url in video | Add `youtube_url` to videos |
| "Invalid JSON format" | Malformed JSON | Validate JSON syntax online |

## Code Reference

The import/export functionality is handled by:

- **Service**: `App\Services\CourseImportExportService.php`
- **Import Action**: `App\Filament\Resources\Courses\Actions\ImportCoursesAction.php`
- **Export Action**: `App\Filament\Resources\Courses\Actions\ExportCourseAction.php`

### Service Methods

```php
$service = new CourseImportExportService();

// Import a course from array
$course = $service->importCourse($jsonArray);

// Export a course to array
$courseArray = $service->exportCourse($courseModel);
```

## Getting Help

For assistance with:
- **JSON format issues**: Check the documentation in the course edit page or the example file
- **Import errors**: Read the error message carefully, it usually indicates what field is missing
- **Technical questions**: Contact your development team

---

**Example JSON File**: See `COURSE_IMPORT_EXPORT_EXAMPLE.json` in this directory for a complete working example.

**Last Updated**: February 2026
