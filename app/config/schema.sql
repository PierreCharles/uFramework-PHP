DROP TABLE IF EXISTS STATUSES;
DROP TABLE IF EXISTS USERS;

--
-- Structure de la table `Statuses`
--
CREATE TABLE USER(
  user_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  user_name VARCHAR(100) NOT NULL,
  user_password VARCHAR(100) NOT NULL
);

--
-- Structure de la table `Statuses`
--
CREATE TABLE STATUSES(
  status_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  status_message VARCHAR(500) NOT NULL,
  status_user_id INTEGER,
  status_date DATETIME NOT NULL,
  FOREIGN KEY (status_user_id) REFERENCES USERS(user_id) ON DELETE CASCADE
);

