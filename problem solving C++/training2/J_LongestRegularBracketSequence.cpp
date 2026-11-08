// #include <iostream>
// #include <vector>
// #include <algorithm>
// #include <string>
// using namespace std;
// void solve()
// {
//     string s;
//     cin>>s;
//     int cnt =0;
//     int lngth = 0;

//     for (int i = 0; i < s.size(); i++)
//     {
//         if(s[i] == '('){
//             cnt++;
//         }else{
//             cnt--;
//         }
//         lngth++;
//         if(cnt==0){
//             // map here with key lnght and value++
//         }
//     }

// }

// int main()
// {
//     ios_base::sync_with_stdio(false);
//     cin.tie(NULL);
//     solve();
//     return 0;
// }

#include <iostream>
#include <vector>
#include <algorithm>
#include <string>
#include <map>
using namespace std;

void solve()
{
    string s;
    cin >> s;
    int cnt = 0;
    int lngth = 0;
    map<int, int> mp; // key: lngth, value: how many times it happened

    for (int i = 0; i < (int)s.size(); i++)
    {
        if (s[i] == ')' and cnt < 0)
        {
            continue;
        }
        if (s[i] == '(')
        {
            cnt++;
        }
        else
        {
            cnt--;
        }
        lngth++;

        if (cnt == 0)
        {
            mp[lngth]++;
            lngth = 0;
        }
    }

    // print the map (sorted by length)
    for (auto &p : mp)
    {
        cout << p.first << " -> " << p.second << "\n";
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}