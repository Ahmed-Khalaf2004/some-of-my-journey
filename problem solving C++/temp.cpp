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

        int n;
        cin >> n;
        vector<int> v(n + 1);
        int cnt = 0;
        int tmp = 1;
        for (int i = 1; i <= n; i++)
        {
            cin >> v[i];
        }
        for (int i = 1; i <= n; i++)
        {
            if (v[i] != tmp)
            {
                cnt++;
            }
            else
            {
                tmp++;
            }
        }

        // bool test = true;
        // for (int i = n; i >= 1; i--)
        // {
        //     if (v[i] == n)
        //     {
        //         // test = false;
        //         break;
        //     }
        //     cnt++;
        // }
        // // if (test)
        // // {
        // int to = n - cnt;
        // for (int i = to; i > 1; i--)
        // {
        //     if (v[i + 1] != v[i] + 1)
        //     {
        //         cnt = cnt + i;
        //         break;
        //     }
        // }
        // // }

        cout << cnt << endl;
    }
}
int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    freopen("candy.in", "r", stdin);
    solve();
    return 0;
}