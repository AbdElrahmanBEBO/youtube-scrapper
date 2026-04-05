# 📺 YouTube Playlists Scrapper

>A Laravel-based tool that automatically scrapes and organizes YouTube playlists by category. Powered by the YouTube Data API and AI Agents to intelligently classify and store playlists — making it easy to browse, filter, and manage course content in one place.


## 👨‍💻 Made by

Made with ❤️ by **Abdelrahman Mohamed**

💼 [LinkedIn](https://www.linkedin.com/in/577069203)


## ⚙️ Setup Project

### 1. Clone the Repository

```bash
git clone https://github.com/AbdElrahmanBEBO/youtube-scrapper.git

cd youtube-scrapper
```

---

### 2. Run Setup

```bash
composer run setup
```

This will automatically:
- Install PHP dependencies
- Create `.env` file
- Generate application key
- Install NPM dependencies

---

### 3. Create MySQL Database

Create a new database schema in MySQL:

```sql
CREATE DATABASE youtube-scrapper-db;
```

---

### 4. Configure Environment Variables

Open your `.env` file and fill in the following keys:

#### Database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=youtube-scrapper_db
DB_USERNAME=<your-username>
DB_PASSWORD=<your-password>
```

#### API Keys

```env
GEMINI_API_KEY=AIzaSyACZ-KzTzY3zcfsMfjXfdvWZlkgv3qsaYA
GEMINI_MODEL=gemini-2.5-flash
GEMINI_MAX_TOKENS=4096
YOUTUPE_API_KEY=AIzaSyB-tw6kDxtkihL-746y9f1V7Vuzio29ljk
```

> ⚠️ **If the above API keys have expired**, generate your own:
> - **YouTube API Key** → [Google Cloud Console](https://console.cloud.google.com/)
> - **Gemini API Key** → [Google AI Studio](https://aistudio.google.com/)

---

### 5. Run Production

```bash
composer run production
```

This will:
- Run database migrations
- Build frontend assets
- Start the application server

---


### 5. Run Queue

```bash
composer run queue
```

This will:
- Start the queue to listen

---
