-- SQL to create the responses table in Supabase
CREATE TABLE responses (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    question1 TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT NOW()
);