Scentora Laravel migration starter

Contains 20 migration files for the schema discussed in the conversation.

Install:
1. Back up your project/database if needed.
2. Copy all *.php files into your Laravel project's database/migrations/ directory.
3. Confirm migration filenames do not collide with existing migrations and adjust timestamps if necessary.
4. Configure DB_DATABASE=scentora_db in .env and create the database.
5. Run: php artisan migrate

Notes:
- These migrations target a modern Laravel version using anonymous migration classes and Blueprint helpers.
- The users table uses one role column (admin/customer); enforce authorization in middleware/policies.
- Ensure at least one of email or phone is required with application validation (a DB CHECK can be added if desired).
- Inventory movements should be created in the same transaction as the corresponding stock update.
- Review payment, tax, shipping, privacy, and stock-reservation flows before production.
- This is a starter schema, not a complete checkout implementation.
