# Финальные действия на GitHub (выполняются владельцем аккаунта)

1. Создайте **пустой приватный** репозиторий `student-catalog` на GitHub, **без** начального README и .gitignore.
2. Откройте терминал в папке этого проекта. Укажите URL своего репозитория:

```powershell
git remote add origin https://github.com/ВАШ_ЛОГИН/student-catalog.git
git push -u origin main
git push -u origin feature/add-student
```

3. В GitHub откройте **Pull requests → New pull request**; выберите base=`main`, compare=`feature/add-student`.
4. **Важно:** в передаваемом архиве ветка `main` уже локально содержит результат `feature/add-student`, поэтому обычный PR не покажет различий. Чтобы получить настоящий PR, прежде чем публиковать ветки, верните `main` к исходному коммиту **локально** (только если репозиторий новый и ещё не публиковался):

```powershell
git switch main
git log --oneline --all --graph
# Найдите хеш коммита "Create Laravel project" и замените НАЧАЛЬНЫЙ_ХЕШ ниже.
git reset --hard НАЧАЛЬНЫЙ_ХЕШ
git push -u origin main
git push -u origin feature/add-student
```

5. После публикации веток на GitHub создайте PR `feature/add-student` → `main`, проверьте изменения, нажмите **Merge pull request**. Сохраните URL PR и URL репозитория в документ сдачи. Не используйте `force push` в существующих чужих репозиториях.

**Проще:** используйте уже подготовленные ветки и команду сброса main только в новом пустом репозитории, чтобы PR был настоящим. **Никакой PR в этом архиве автоматически не создан.**
