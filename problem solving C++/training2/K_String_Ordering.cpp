#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int k, n;
    cin >> n >> k;
    string mainS;
    cin >> mainS;
    vector<string> s(k);
    for (int i = 0; i < k; i++)
    {
        cin >> s[i];
    }
    // for (int i = 0; i < s.size(); i++)
    // {
    //     if (s[i][0] == mainS[0])
    //     {
    //         for (int j = i + 1; i < s.size(); j++)
    //         {
    //             if (s[j][s[j].size() - 1] == mainS[mainS.size() - 1])
    //             {
    //                 cout << "YES";
    //                 return;
    //             }
    //         }
    //         for (int j = 0; j < i; j++)
    //         {
    //             if (s[j][s[j].size() - 1] == mainS[mainS.size() - 1])
    //             {
    //                 cout << "YES";
    //                 return;
    //             }
    //         }
    //     }
    // }
    bool test = false;
    for (int i = 0; i < k; i++)
    {
        if (!s[i].empty() && s[i][0] == mainS[0])
        {
            for (int j = i + 1; j < k; j++)
            {
                if (!s[j].empty() &&
                    s[j][s[j].size() - 1] == mainS[n - 1])
                {
                    test = true;
                }
            }

            for (int j = 0; j < i; j++)
            {
                if (!s[j].empty() &&
                    s[j][s[j].size() - 1] == mainS[n - 1])
                {
                    test = true;
                }
            }
        }
    }
    if (test)
    {
        for (int i = 0; i < k; i++)
        {
            size_t pos = mainS.find(s[i]);
            if (pos != string::npos)
            {
                mainS.erase(pos, s[i].size());
            }
            else
            {
                test = false;
            }
        }
    }
    if (test)
    {
        cout << "YES";
    }
    else
    {

        cout << "NO";
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}