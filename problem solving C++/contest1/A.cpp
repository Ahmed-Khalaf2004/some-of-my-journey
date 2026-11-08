#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
// void solve()
// {
//     string s, t;
//     cin >> s >> t;
//     int max = max(t.size(), s.size());
//     int temp = -1;
// //     lebanoncpc
// //      icpc
//     for (int i = s.size() - 1; i >= 0; i--)
//     {
//         if (s[i] == t[i])
//         {
//             continue;
//         }
//         else
//         {
//             temp = i;
//             break;
//         }
//     }

//     int ans;
//     ans = temp + 1;
//     int cnt;
//     int j = 0;
//     while (t[j] != s[temp])
//     {
//         ans++;
//         j++;
//     }
//     cout << ans;
// }

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    // solve();
    return 0;

    string s, t;
    cin >> s >> t;
    int ans = 0;

    int mx = max(s.size(), t.size());
    int mn = min(s.size(), t.size());

    for (int i = mx - 1; i >= 0; i--)
    {
        if (s[i] == t[i])
        {
            ans += 1;
        }
        else
        {
            break;
        }
    }

    cout << ans;
}
// cout<<(s.size()+t.size()-(2*ans.size()));