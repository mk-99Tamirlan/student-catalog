# GitHub: публикация и Pull Request — ЛР №45

В архиве уже есть настоящая Git-история: `main` содержит только исходный Laravel-проект, а `feature/add-student` — разработанную функциональность и отчёт. **Не выполняйте `git init`, `git reset --hard` или `git merge` перед созданием PR.**

1. Создайте на GitHub **новый пустой приватный** репозиторий `student-catalog` без автоматического README, лицензии и .gitignore.
2. Распакуйте архив и откройте терминал **внутри `student-catalog`**, где находятся `.git` и `artisan`.
3. Выполните, заменив `ВАШ_ЛОГИН` на свой GitHub username:

```powershell
git status
git branch -a
git remote add origin https://github.com/ВАШ_ЛОГИН/student-catalog.git
git push -u origin main
git push -u origin feature/add-student
```

Если `origin` уже настроен, используйте `git remote -v`, а не добавляйте его второй раз.

4. На GitHub выберите **Pull requests → New pull request**, base=`main`, compare=`feature/add-student`. Проверьте изменения и создайте PR. После проверки нажмите **Merge pull request**.
5. Обновите локальную `main`:

```powershell
git switch main
git pull --ff-only origin main
```

6. Скопируйте URL репозитория и **объединённого PR** в `ОТЧЕТ_ЛР45.docx`, затем приложите реальные скриншоты из запущенного приложения.

**Важно:** если у вас уже есть существующий непустой репозиторий с проектом ЛР №44, не перезаписывайте его историю. Эта инструкция предназначена только для **нового пустого репозитория** ЛР №45.
