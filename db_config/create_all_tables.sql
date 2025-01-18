
CREATE TABLE books
(
  book_id     serial  NOT NULL,
  category_id VARCHAR NOT NULL,
  price       float4  NOT NULL,
  editorial   varchar,
  volume      integer,
  isbn        varchar NOT NULL,
  language    varchar NOT NULL,
  title       VARCHAR NOT NULL,
  description varchar,
  image       varchar,
  popular     boolean,
  recommended boolean,
  author      varchar NOT NULL,
  PRIMARY KEY (book_id)
);

CREATE TABLE categories
(
  category_id VARCHAR NOT NULL,
  type        varchar NOT NULL,
  PRIMARY KEY (category_id)
);

DROP TABLE IF EXISTS orderlines;
CREATE TABLE orderlines(
    orderline_id SERIAL NOT NULL,
    quantity integer NOT NULL,
    order_id integer NOT NULL,
    book_id integer NOT NULL,
    book_title varchar(255),
    book_price double precision,
    PRIMARY KEY(orderline_id),
    CONSTRAINT fk_orders_to_orderlines FOREIGN key(order_id) REFERENCES orders(order_id),
    CONSTRAINT fk_books_to_orderlines FOREIGN key(book_id) REFERENCES books(book_id)
);

DROP TABLE IF EXISTS orders;
CREATE TABLE orders(
    order_id SERIAL NOT NULL,
    user_id integer NOT NULL,
    "date" date,
    quantity integer,
    total_price double precision,
    PRIMARY KEY(order_id),
    CONSTRAINT fk_users_to_orders FOREIGN key(user_id) REFERENCES users(user_id)
);

DROP TABLE IF EXISTS users;

CREATE TABLE users
(
  user_id      serial  NOT NULL,
  name         varchar NOT NULL,
  email        VARCHAR NOT NULL,
  password     varchar,
  address      varchar NOT NULL,
  city         varchar NOT NULL,
  postal_code  varchar NOT NULL,
  phone_number integer NOT NULL,
  PRIMARY KEY (user_id)
);

ALTER TABLE orders
  ADD CONSTRAINT FK_users_TO_orders
    FOREIGN KEY (user_id)
    REFERENCES users (user_id);

ALTER TABLE books
  ADD CONSTRAINT FK_categories_TO_books
    FOREIGN KEY (category_id)
    REFERENCES categories (category_id);

ALTER TABLE orderlines
  ADD CONSTRAINT FK_orders_TO_orderlines
    FOREIGN KEY (order_id)
    REFERENCES orders (order_id);

ALTER TABLE orderlines
  ADD CONSTRAINT FK_books_TO_orderlines
    FOREIGN KEY (book_id)
    REFERENCES books (book_id);
