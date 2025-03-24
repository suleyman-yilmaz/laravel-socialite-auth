#### Bu proje, **Laravel Socialite** paketini kullanarak **Google** ve **Facebook** üzerinden kullanıcı girişi yapmayı öğretir. Laravel uygulamanıza kolayca sosyal medya hesaplarıyla oturum açma özelliği eklemenize yardımcı olur.

# Initial Setup and Required Steps
### Step 1: Clone the Repository

```bash
git clone https://github.com/suleyman-yilmaz/laravel-socialite-auth.git
```
if use ssh
```bash
git clone git@github.com:suleyman-yilmaz/laravel-socialite-auth.git
```
---
```bash
cd laravel-socialite-auth
```
### Step 2: Install Required Commitments
- composer install
- npm install & npm run build
- copy and duplicate  .env.exapmle and rename it to .env
- Enter your Facebook and Google IDs.
- php artisan key:generate
- php artisan migrate

### Step 3: Run the Project
- php artisan serve
---
