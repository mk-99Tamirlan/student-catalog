# Действия для настоящего Pull Request на GitHub

**В архиве есть локальные коммиты и обе ветки, но нет GitHub-репозитория и Pull Request.** Чтобы создать PR, публикуйте новый пустой приватный репозиторий следующим образом.

1. Откройте папку проекта и убедитесь, что текущая ветка `main`. Посмотрите историю `git log --oneline --graph --all`.
2. Найдите хеш самого первого коммита `Create Laravel project` (в подготовленном архиве это `2c00e04`). **Только в этом новом локальном репозитории, до первой публикации**, откатите `main` к нему:

```powershell
git switch main
git reset --hard 2c00e04
```

3. Создайте на github.com пустой **приватный** репозиторий `student-catalog`, без README и .gitignore. Подключите его и опубликуйте обе ветки:

```powershell
git remote add origin https://github.com/ВАШ_ЛОГИН/student-catalog.git
git push -u origin main
git push -u origin feature/add-student
```

4. В GitHub: **Pull requests → New pull request**, base=`main`, compare=`feature/add-student`. Создайте PR с названием `Add student catalog and form validation`, посмотрите файлы и нажмите **Merge pull request**.
5. Скопируйте ссылки на приватный репозиторий и объединённый PR в Word-отчёт. Дайте преподавателю доступ к приватному репозиторию при необходимости.
6. Если нужен Word-отчёт в GitHub, добавьте его отдельным коммитом в main после слияния PR: `git add ОТЧЕТ_ЛР45.docx; git commit -m "Add submission report"; git push`.

**Не применяйте reset --hard и force push в существующем репозитории с чужими изменениями.** Команда предназначена только для подготовленного локального учебного проекта **до первой публикации**.
