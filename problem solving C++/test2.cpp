#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int n;
    cin >> n;
    vector<int> v(n);
    int cnt5 = 0;
    int cnt0 = 0;
    int mod;
    int num5;
    for (int i = 0; i < n; i++)
    {
        cin >> v[i];
    }
    for (int i = 0; i < n; i++)
    {
        if (v[i] == 5)
        {
            cnt5++;
        }
        if (v[i] == 0)
        {
            cnt0++;
        }
    }

    if ((cnt5 < 8))
    {
        cout << 0;
    }
    else
    {
        mod = (cnt5 * 5) % 8;
        num5 = cnt5 - mod;
    }
    string s;
    s += ('5' - '0') * num5;
    s += ('0' - '0') * cnt0;
    cout << s << endl;
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}