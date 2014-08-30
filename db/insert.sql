USE progfarm;

-- levels
INSERT INTO levels (name, points, description)
  VALUES
    ('Pawn', 2, 'easy problem'),
    ('Knight', 5, 'easy-medium problem'),
    ('Bishop', 10, 'medium problem'),
    ('Rook', 20, 'medium-hard problem'),
    ('Queen', 50, 'hard problem'),
    ('King', 100, 'super-hard problem');

-- platforms
INSERT INTO platforms (name, url, description)
  VALUES
    ('Codeforces', 'http://codeforces.com/', 'russian platform'),
    ('POJ', 'http://poj.org/', 'pku platform'),
    ('CodeChef', 'http://www.codechef.com/', 'indian platform'),
    ('UVA', 'http://uva.onlinejudge.org/', ''),
    ('UVALive', 'https://icpcarchive.ecs.baylor.edu/index.php', ''),
    ('HDU', 'http://acm.hdu.edu.cn/', ''),
    ('SPOJ', 'http://www.spoj.com/', '');

-- languages
INSERT INTO languages (name, description)
  VALUES
    ('C', 'gcc'),
    ('C++', 'g++'),
    ('Java', 'java 8'),
    ('Python', 'python 2.7'),
    ('C#', '');

-- problems
INSERT INTO problems (code, title, url, platform_id, level_id, description)
  VALUES
    ('CC CRAWA', 'The Leaking Robot', 'http://www.codechef.com/AUG14/problems/CRAWA', 3, 1, 'strfwd'),
    ('POJ 1475', 'Pushing Boxes', 'http://poj.org/problem?id=1475', 2, 3, 'bfs'),
    ('CF 454D', 'Little Pony and Harmony Chest', 'http://codeforces.com/contest/454/problem/D', 1, 4, 'dp');

-- users
INSERT INTO users (name, username, password, regtime, email, privilege)
  VALUES
    ('Bowen Yu', 'yubowenok', 'test', 969681600000, 'byu@progfarm.edu', 1),
    ('Juno Zeng', 'zyt144', 'test', 969681600000, 'yzeng@progfarm.edu', 2);

-- submissions
INSERT INTO submissions_problems (problem_id, user_id, language_id, time, url, description)
  VALUES
    (3, 1, 2, 969681600000, 'http://codeforces.com/contest/453/submission/7322588', 'good code'),
    (1, 1, 2, 969681600000, 'http://www.codechef.com/viewsolution/4439433', 'poor code');
