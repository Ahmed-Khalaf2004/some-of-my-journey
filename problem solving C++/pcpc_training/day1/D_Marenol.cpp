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
        string s1;
        string s2;
        cin >> s1 >> s2;
        bool test = false;
        for (int i = 0; i < n - 1; i++)
        {
            if ((s1[i] == '0' && s1[i + 1] == '0') || (s1[i] == '1' && s1[i + 1] == '1'))
            {
                test = true;
                break;
            }
        }
        if (test)
        {
            cout << "YES" << endl;
        }
        else
        {
            cout << "NO" << endl;
        }
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}