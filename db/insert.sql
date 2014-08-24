USE progfarm;

-- levels
INSERT INTO levels (name, points)
  VALUES
    ('Pawn', 2),
    ('Knight', 5),
    ('Bishop', 10),
    ('Rook', 20),
    ('Queen', 50),
    ('King', 100);

-- platforms
INSERT INTO platforms (name, url)
  VALUES
    ('Codeforces', 'http://codeforces.com/'),
    ('POJ', 'http://poj.org/'),
    ('CodeChef', 'http://www.codechef.com/'),
    ('UVA', 'http://uva.onlinejudge.org/'),
    ('UVALive', 'https://icpcarchive.ecs.baylor.edu/index.php'),
    ('HDU', 'http://acm.hdu.edu.cn/'),
    ('SPOJ', 'http://www.spoj.com/');

-- languages
INSERT INTO languages (name)
  VALUES
    ('C'),
    ('C++'),
    ('Java'),
    ('Python'),
    ('C#');

-- problems
INSERT INTO problems (code, title, url, platform_id, level_id)
  VALUES
    ('CC CRAWA', 'The Leaking Robot', 'http://www.codechef.com/AUG14/problems/CRAWA', 3, 1),
    ('POJ 1475', 'Pushing Boxes', 'http://poj.org/problem?id=1475', 2, 3),
    ('CF 454D', 'Little Pony and Harmony Chest', 'http://codeforces.com/contest/454/problem/D', 1, 4);

-- users
INSERT INTO users (name, username, password, regtime, email, privilege)
  VALUES
    ('Bowen Yu', 'yubowenok', 'test', 969681600000, 'byu@progfarm.edu', 1),
    ('Juno Zeng', 'zyt144', 'test', 969681600000, 'yzeng@progfarm.edu', 2);

-- submissions
INSERT INTO submissions (problem_id, user_id, language_id, time, url)
  VALUES
    (3, 1, 2, 969681600000, 'http://codeforces.com/contest/453/submission/7322588'),
    (1, 1, 2, 969681600000, 'http://www.codechef.com/viewsolution/4439433');
