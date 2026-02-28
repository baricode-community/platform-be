<div class="mt-8 space-y-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
            📋 Import/Export Format Documentation
        </h3>
        
        <div class="space-y-6">
            <!-- JSON Format Section -->
            <div>
                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100 mb-3">
                    📦 JSON Format Structure
                </h4>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                    Use this JSON structure to import or understand the export format for courses. Each course can contain multiple categories, and each category can contain multiple lessons with YouTube videos.
                </p>
                
                <div class="bg-gray-50 dark:bg-gray-900 rounded p-4 overflow-x-auto">
                    <pre class="text-xs font-mono text-gray-800 dark:text-gray-200"><code>{
  "title": "Laravel Fundamentals",
  "description": "Learn the basics of Laravel framework",
  "slug": "laravel-fundamentals",
  "is_published": true,
  "categories": [
    {
      "title": "Introduction",
      "description": "Get started with Laravel",
      "order": 1,
      "is_published": true,
      "lessons": [
        {
          "title": "What is Laravel?",
          "description": "Introduction to Laravel",
          "content": "Laravel is a web framework...",
          "order": 1,
          "duration": 600,
          "is_published": true,
          "youtube_list": [
            {
              "youtube_url": "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
              "title": "Laravel Intro Video",
              "description": "An introduction to Laravel",
              "order": 1,
              "is_published": true
            }
          ]
        }
      ]
    }
  ]
}</code></pre>
                </div>
            </div>

            <!-- Field Documentation -->
            <div>
                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100 mb-3">
                    🏷️ Field Descriptions
                </h4>
                
                <div class="space-y-4">
                    <!-- Course Level -->
                    <div class="border-l-4 border-blue-500 pl-4">
                        <h5 class="font-semibold text-gray-800 dark:text-gray-100 text-sm mb-2">Course Level</h5>
                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">title</strong> (required) — Course title/name
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">description</strong> (optional) — Course description/summary
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">slug</strong> (optional) — URL-friendly identifier (auto-generated from title if not provided)
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">is_published</strong> (optional, default: false) — Boolean to publish/unpublish the course
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">categories</strong> (array) — Array of course categories
                            </div>
                        </div>
                    </div>

                    <!-- Category Level -->
                    <div class="border-l-4 border-green-500 pl-4">
                        <h5 class="font-semibold text-gray-800 dark:text-gray-100 text-sm mb-2">Category Level</h5>
                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">title</strong> (required) — Category name
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">description</strong> (optional) — Category description
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">order</strong> (optional, default: 0) — Display order number
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">is_published</strong> (optional, default: false) — Boolean to publish/unpublish
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">lessons</strong> (array) — Array of lessons in this category
                            </div>
                        </div>
                    </div>

                    <!-- Lesson Level -->
                    <div class="border-l-4 border-yellow-500 pl-4">
                        <h5 class="font-semibold text-gray-800 dark:text-gray-100 text-sm mb-2">Lesson Level</h5>
                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">title</strong> (required) — Lesson title
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">description</strong> (optional) — Lesson description
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">content</strong> (optional) — Lesson content/body text
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">order</strong> (optional, default: 0) — Display order
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">duration</strong> (optional, default: 0) — Lesson duration in seconds
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">is_published</strong> (optional, default: false) — Boolean to publish/unpublish
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">youtube_list</strong> (array) — Array of YouTube videos
                            </div>
                        </div>
                    </div>

                    <!-- YouTube List Level -->
                    <div class="border-l-4 border-red-500 pl-4">
                        <h5 class="font-semibold text-gray-800 dark:text-gray-100 text-sm mb-2">YouTube Video Level</h5>
                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">youtube_url</strong> (required) — Full YouTube video URL
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">title</strong> (optional) — Video title
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">description</strong> (optional) — Video description
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">order</strong> (optional, default: 0) — Display order
                            </div>
                            <div>
                                <strong class="text-gray-800 dark:text-gray-200">is_published</strong> (optional, default: false) — Boolean to publish/unpublish
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Import/Export Instructions -->
            <div>
                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100 mb-3">
                    💡 How to Use
                </h4>
                <div class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                    <div>
                        <strong class="text-gray-800 dark:text-gray-200 block mb-1">📥 Importing:</strong>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Go to the Courses list page (click "Courses" in the sidebar)</li>
                            <li>Click the "Import Course" button at the top</li>
                            <li>Choose between uploading a JSON file or pasting JSON directly</li>
                            <li>The system will create/update the course and all nested data</li>
                        </ul>
                    </div>
                    <div>
                        <strong class="text-gray-800 dark:text-gray-200 block mb-1">📤 Exporting:</strong>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Open any course in edit mode</li>
                            <li>Click the "Export Course" button at the top</li>
                            <li>A JSON file will be downloaded with the course data</li>
                            <li>Use this file to import the course elsewhere</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Important Notes -->
            <div>
                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100 mb-3">
                    ⚙️ Important Notes
                </h4>
                <ul class="list-disc pl-5 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li>All required fields must be provided, or the import will fail</li>
                    <li>Optional fields default to empty strings or false if not provided</li>
                    <li>The slug is auto-generated from the title if not provided</li>
                    <li>Order fields should be numeric values for proper sorting</li>
                    <li>Duration for lessons should be in seconds (e.g., 600 = 10 minutes)</li>
                    <li>YouTube URLs should be the full URL (e.g., https://www.youtube.com/watch?v=...)</li>
                    <li>All nested data (categories, lessons, videos) is required in an array format</li>
                    <li>If a course with the same slug exists, it will be updated instead of created</li>
                    <li>All timestamps (created_at, updated_at) are automatically handled</li>
                </ul>
            </div>

            <!-- Example Minimal JSON -->
            <div>
                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100 mb-3">
                    📝 Minimal Example (Only Required Fields)
                </h4>
                <div class="bg-gray-50 dark:bg-gray-900 rounded p-4 overflow-x-auto">
                    <pre class="text-xs font-mono text-gray-800 dark:text-gray-200"><code>{
  "title": "Quick Course",
  "categories": [
    {
      "title": "Intro",
      "lessons": [
        {
          "title": "Getting Started",
          "youtube_list": [
            {
              "youtube_url": "https://www.youtube.com/watch?v=dQw4w9WgXcQ"
            }
          ]
        }
      ]
    }
  ]
}</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>
