CREATE TABLE IF NOT EXISTS community_users (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(80) NOT NULL,
    email VARCHAR(190) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    privacy_accepted_at TIMESTAMP NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_community_users_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS community_announcements (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NOT NULL,
    category ENUM('evento', 'notizia', 'immobiliare', 'altro') NOT NULL,
    title VARCHAR(150) NOT NULL,
    location VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    contact_email VARCHAR(190) DEFAULT NULL,
    status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
    moderated_by BIGINT UNSIGNED DEFAULT NULL,
    moderated_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY ix_community_announcements_status_created (status, created_at),
    KEY ix_community_announcements_user_created (user_id, created_at),
    CONSTRAINT fk_community_announcements_user
        FOREIGN KEY (user_id) REFERENCES community_users (id) ON DELETE CASCADE,
    CONSTRAINT fk_community_announcements_moderator
        FOREIGN KEY (moderated_by) REFERENCES community_users (id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
