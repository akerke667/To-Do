# TaskManager ER Diagram

```mermaid
erDiagram
    USERS ||--o{ TASKS : creates
    USERS ||--o{ CATEGORIES : owns
    CATEGORIES o|--o{ TASKS : contains

    USERS {
        int id PK
        varchar name
        varchar email
        varchar password
    }

    TASKS {
        int id PK
        int user_id FK
        int category_id FK
        varchar title
        text description
        varchar status
    }

    CATEGORIES {
        int id PK
        int user_id FK
        varchar name
    }
