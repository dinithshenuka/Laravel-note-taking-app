# Laravel Note-Taking Application

<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></p>

A simple note-taking application built with Laravel that allows users to create, view, edit, and delete notes. This application provides a clean, responsive interface for managing your personal notes.

## Features

- **Create Notes**: Add new notes with title and content.
- **View Notes**: See all your notes in a clean, organized layout.
- **Edit Notes**: Update the title and content of existing notes.
- **Delete Notes**: Remove notes you no longer need.
- **Responsive Design**: Works on desktop and mobile devices.
- **Flash Messages**: Provides feedback for user actions.

## Requirements

- PHP 8.0+
- Composer
- MySQL or SQLite
- Node.js & NPM (for frontend assets)

## Installation

Follow these steps to get the application running on your local machine:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/dinithshenuka/Laravel-note-taking-app.git
   cd Laravel-note-taking-app
   ```

2. **Install Dependencies**

   ```bash
   composer install
   npm install
   ```

3. **Set Up Environment Variables**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database**

   Edit the `.env` file and set up your database connection:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

   For SQLite, you can use:

   ```
   DB_CONNECTION=sqlite
   ```

   And create an empty database file:

   ```bash
   touch database/database.sqlite
   ```

5. **Run Migrations**

   ```bash
   php artisan migrate
   ```

6. **Build Assets (optional)**

   ```bash
   npm run dev
   ```

7. **Start the Development Server**

   ```bash
   php artisan serve
   ```

   The application will be available at http://localhost:8000.

## Usage

### Creating a New Note

1. Go to the notes index page at `/notes`.
2. Click on the "Add New Note" button.
3. Fill in the title and content in the form.
4. Click "Save Note" to create your note.

### Viewing Notes

- Visit `/notes` to see all your notes.
- Click on the "View" link under any note to see its full content.

### Editing a Note

1. Go to the notes index page at `/notes`.
2. Click on the "Edit" link under the note you want to update.
3. Update the title and/or content.
4. Click "Update Note" to save your changes.

### Deleting a Note

1. Go to the notes index page at `/notes`.
2. Click on the "Delete" link under the note you want to remove.
3. Confirm the deletion when prompted.

## API Endpoints

The application provides RESTful API endpoints for all CRUD operations:

### List all notes
```
GET /notes
```

### Show note creation form
```
GET /notes/create
```

### Store a new note
```
POST /notes
```
Required parameters:
- `title`: string
- `content`: string

### Show a specific note
```
GET /notes/{id}
```

### Show note editing form
```
GET /notes/{id}/edit
```

### Update a note
```
PUT/PATCH /notes/{id}
```
Required parameters:
- `title`: string
- `content`: string

### Delete a note
```
DELETE /notes/{id}
```

## Project Structure

### Key Files

- **Controllers**: `app/Http/Controllers/NoteController.php`
- **Models**: `app/Models/Note.php`
- **Views**: 
  - `resources/views/notes/index.blade.php`
  - `resources/views/notes/create.blade.php`
  - `resources/views/notes/show.blade.php`
  - `resources/views/notes/edit.blade.php`
- **Routes**: `routes/web.php`
- **Migrations**: `database/migrations/2025_05_16_155443_create_notes_table.php`

### Database Schema

The `notes` table contains:

- `id`: Primary key (auto-incremented)
- `title`: String (required)
- `content`: Text (required)
- `created_at`: Timestamp
- `updated_at`: Timestamp

## Customization

### Styling

The application uses Tailwind CSS for styling. You can customize the look and feel by editing the view files in the `resources/views/notes` directory.

### Adding Features

Here are some ideas for extending the application:

- User authentication
- Categories/tags for notes
- Markdown support for note content
- Search functionality
- Soft delete (trash bin) for notes
- Note sharing
- Rich text editor

## Troubleshooting

### Common Issues

1. **Database Connection Issues**
   - Ensure your database server is running
   - Check credentials in the `.env` file
   - Try `php artisan migrate:status` to verify the connection

2. **Migration Issues**
   - Run `php artisan migrate:fresh` to recreate the database
   - Check for any errors in the migration files

3. **Server Issues**
   - Make sure ports are not in use by other applications
   - Try `php -S localhost:8001 -t public` as an alternative to `artisan serve`

4. **View Issues**
   - Run `php artisan view:clear` to clear the view cache
   - Check blade syntax in view files

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
