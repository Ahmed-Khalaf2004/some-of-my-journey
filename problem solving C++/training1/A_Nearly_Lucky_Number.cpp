#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    string n;
    cin >> n;
    for (int i = 0; i < n.length(); i++)
    {
        if (n[i] != '7' || n[i] != '4' || n[i] != ',')
        {
            cout << "NO" << endl;
            return;
        }
    }
    cout << "YES" << endl;
    return;
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}