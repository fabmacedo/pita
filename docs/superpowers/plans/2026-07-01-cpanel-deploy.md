# cPanel Git Deploy Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Configure this PHP site for cPanel Git deployment into `$HOME/public_html/` without overwriting `config/database.php`.

**Architecture:** cPanel reads `.cpanel.yml` from the repository root and runs shell tasks during deployment. The deploy copies only runtime files and public asset directories, creates `public_html/config`, and copies only `config/.htaccess` there so the server's existing `config/database.php` remains untouched.

**Tech Stack:** PHP, Apache `.htaccess`, cPanel Git Version Control deployment YAML.

---

### Task 1: Deployment Manifest

**Files:**
- Create: `.cpanel.yml`
- Create: `README.md`
- Create: `config/database.example.php`
- Modify Git index: untrack `config/database.php` while keeping the local file

- [ ] **Step 1: Add `.cpanel.yml`**

Create a root `.cpanel.yml` with explicit copy commands to `$HOME/public_html/`. Do not use wildcards. Copy `config/.htaccess`, but do not copy `config/database.php`.

- [ ] **Step 2: Add database example**

Create `config/database.example.php` with placeholder credentials so new environments know how to create their private `config/database.php`.

- [ ] **Step 3: Document cPanel flow**

Create `README.md` with cPanel steps: clone outside `public_html`, keep `public_html/config/database.php` on the server, run **Update from Remote**, then **Deploy HEAD Commit**.

- [ ] **Step 4: Untrack private config**

Run:

```bash
git rm --cached config/database.php
```

Expected: `config/database.php` remains on disk but is removed from future commits because `.gitignore` already contains `config/database.php`.

- [ ] **Step 5: Verify**

Run:

```bash
git status --short
git ls-files config/database.php
Select-String -Path .cpanel.yml -Pattern 'database.php'
```

Expected: deployment files are changed, `git ls-files config/database.php` prints nothing, and `.cpanel.yml` does not reference `database.php`.
