#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;

void solve()
{
    int t;
    cin >> t;
    while (t--)
    {
        int n, k;
        cin >> n >> k;
        string s;
        cin >> s;

        int red(0), blue(0);
        // mohanned solution:
        for (int i = 0; i < 2 * n; i++)
        {
            // blue turn:
            if (i % 2 == 0)
            {
                if (s[i] == '1')
                {
                    if (s[(i + 1) % (2 * n)] == '0')
                    {
                        blue++;
                    }
                    else
                    {
                        red++;
                    }
                }
            }
            // red turn
            else
            {
                if (s[i] == '1')
                {
                    if (s[(i + 1) % (2 * n)] == '0')
                    {
                        red++;
                    }
                    else
                    {
                        blue++;
                    }
                }
            }
        }
        cout << blue << ' ' << red << endl;

        // my solution:
        // for (int i = 0; i < 2 * n; i++)
        // {
        //     if (i % 2 == 0)
        //     {
        //         if (s[i] == '1')
        //         {
        //             // the case where i will be the last idx
        //             if (i == 2 * n - 1)
        //             {
        //                 if ((s[2 * n - 1] == '1') and s[0] == '0')
        //                 {
        //                     blue++;
        //                     break;
        //                 }
        //                 else
        //                 {
        //                     red++;
        //                     break;
        //                 }
        //             }

        //             if ((s[i + 1] == '0'))
        //             {
        //                 blue++;
        //             }
        //             else
        //             {
        //                 red++;
        //             }
        //         }
        //     }
        //     else
        //     {
        //         if (s[i] == '1')
        //         {
        //             if (i == 2 * n - 1)
        //             {
        //                 if ((s[2 * n - 1] == '1') and (s[0] == '0'))
        //                 {
        //                     red++;
        //                     break;
        //                 }
        //                 else
        //                 {
        //                     blue++;
        //                     break;
        //                 }
        //             }

        //             if ((s[i + 1] == '0'))
        //             {
        //                 red++;
        //             }
        //             else
        //             {
        //                 blue++;
        //             }
        //         }
        //     }
        // }
        // cout << blue << ' ' << red << '\n';
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}