# Class Room Bookings

## Installation

1. **Clone the repository:**

    ```bash
    git clone <repository-url>
    ```

2. **Navigate to the project directory:**

    ```bash
    cd <project-directory>
    ```

3. **Install dependencies:**

    ```bash
    composer install
    ```

4. **Set up environment variables:**

    Create a copy of the `.env.example` file and rename it to `.env`. Update the database and other necessary configuration settings.

5. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

6. **Run database migrations:**

    ```bash
    php artisan migrate
    ```

## Usage

1. **Start the development server:**

    ```bash
    php artisan serve
    ```

2. **Open your web browser and navigate to [http://localhost:8000](http://localhost:8000) to access the application.**

## API Endpoints

### 1. Get Available Classes

- **Endpoint:** `GET /api/classes`
- **Description:** Retrieve all available classes for the current week.
- **Request Parameters:** None
- **Response Format:**

    ```json
    [
        {
            "classroom": "Classroom A",
            "day": "Monday",
            "time": "09:00"
        },
        {
            "classroom": "Classroom B",
            "day": "Wednesday",
            "time": "14:00"
        },
        ...
    ]
    ```

### 2. Book a Class

- **Endpoint:** `POST /api/book`
- **Description:** Book a class in a specific classroom at a given time.
- **Request Parameters:**

    ```json
    {
        "classroom": "Classroom A",
        "class_name": "Math Class",
        "day": "Monday",
        "time": "09:00"
    }
    ```

- **Response Format:**

    ```json
    {
        "success": "Class booked successfully"
    }
    ```

### 3. Cancel a Class

- **Endpoint:** `POST /api/cancel`
- **Description:** Cancel a previously booked class.
- **Request Parameters:**

    ```json
    {
        "booking_id": 1
    }
    ```

- **Response Format:**

    ```json
    {
        "success": "Class canceled successfully"
    }
    ```
