import os
import glob

def replace_in_file(filepath, old_text, new_text):
    if not os.path.exists(filepath): return
    with open(filepath, 'r') as f:
        content = f.read()
    if old_text in content:
        content = content.replace(old_text, new_text)
        with open(filepath, 'w') as f:
            f.write(content)

# Update config/auth.php
replace_in_file('config/auth.php', 'App\\Models\\User::class', 'App\\Models\\Pengguna::class')

# Update controllers and requests
files_to_update = glob.glob('app/Http/Controllers/Auth/*.php') + glob.glob('app/Http/Requests/*.php') + glob.glob('tests/Feature/**/*.php', recursive=True) + glob.glob('database/factories/*.php') + glob.glob('database/seeders/*.php')

for filepath in files_to_update:
    replace_in_file(filepath, 'App\\Models\\User', 'App\\Models\\Pengguna')
    replace_in_file(filepath, 'User::', 'Pengguna::')
    replace_in_file(filepath, '$user', '$pengguna')
    
    # Breeze default fields mapping
    replace_in_file(filepath, "'name'", "'nama_lengkap'")
    replace_in_file(filepath, "'password'", "'kata_sandi'")
    replace_in_file(filepath, '$request->name', '$request->nama_lengkap')
    replace_in_file(filepath, '$request->password', '$request->kata_sandi')
    replace_in_file(filepath, 'name =>', 'nama_lengkap =>')
    replace_in_file(filepath, 'password =>', 'kata_sandi =>')
