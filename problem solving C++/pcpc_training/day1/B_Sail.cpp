#include <iostream>
#include <string>

using namespace std;

int main()
{
    // تحسين سرعة الإدخال والإخراج
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);

    int t;
    long long sx, sy, ex, ey;
    cin >> t >> sx >> sy >> ex >> ey;

    string s;
    cin >> s;

    long long current_x = sx;
    long long current_y = sy;

    for (int i = 0; i < t; i++)
    {
        char wind = s[i];

        // الاستفادة من الرياح فقط إذا كانت تقربنا من الهدف
        if (wind == 'E' && current_x < ex)
        {
            current_x++;
        }
        else if (wind == 'W' && current_x > ex)
        {
            current_x--;
        }
        else if (wind == 'N' && current_y < ey)
        {
            current_y++;
        }
        else if (wind == 'S' && current_y > ey)
        {
            current_y--;
        }

        // التحقق مما إذا وصلنا إلى الهدف
        if (current_x == ex && current_y == ey)
        {
            cout << i + 1 << "\n";
            return 0;
        }
    }

    // إذا انتهت الثواني ولم نصل إلى الهدف
    cout << -1 << "\n";
    return 0;
}