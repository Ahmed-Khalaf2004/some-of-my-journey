// #include <iostream>
// #include <vector>
// #include <algorithm>
// #include <string>

// using namespace std;
// void solve()
// {
//     int n, k;
//     cin >> n >> k;
//     vector<int> v(n);
//     int neg_cnt = 0;
//     for (int i = 0; i < v.size(); i++)
//     {
//         cin >> v[i];
//         if (v[i] < 0)
//         {
//             neg_cnt++;
//         }
//     }

//     int res = 0;
//     if (k > n)
//     {
//         // int len = v.size() - 1;
//         // while (k)
//         // {
//         //     v[len] = -v[len];
//         //     if (len == 1)
//         //     {
//         //         v[0] = -v[0];
//         //         if (k > n)
//         //         {
//         //             len = v.size() - 1;
//         //         }
//         //         else
//         //         {
//         //             len = k;
//         //         }
//         //     }

//         //     len--;
//         //     k--;
//         // }

//         // try 2:
//         int nums = k / n;
//         int ops = k % n;
//         if (nums % 2 == 0)
//         {
//         }
//         else
//         {
//         }

//         for (int i = 0; i < v.size(); i++)
//         {
//             res += v[i];
//         }
//     }

//     else if (k > neg_cnt)
//     {
//         for (int i = 0; i < v.size(); i++)
//         {
//             v[i] = abs(v[i]);
//         }
//         int ops = k - neg_cnt;
//         for (int i = 0; i < ops; i++)
//         {
//             v[i] = -v[i];
//         }
//         for (int i = 0; i < v.size(); i++)
//         {
//             res += v[i];
//         }
//     }

//     else if (k < neg_cnt)
//     {
//         int start = neg_cnt - 1;
//         while (k)
//         {
//             v[start] = abs(v[start]);
//             k--;
//             start--;
//         }

//         for (int i = 0; i < v.size(); i++)
//         {
//             res += v[i];
//         }
//     }
//     else
//     {
//         for (int i = 0; i < v.size(); i++)
//         {
//             res += abs(v[i]);
//         }
//     }

//     cout << res;
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

using namespace std;
void solve()
{
    int n,k;
    cin>>n>>k;
    vector<int> v(n);
    int cnt_neg = 0;
    for (int i = 0; i < n; i++)
    {
        cin>>v[i];
        if(v[i]<0)cnt_neg++;
    }
    int res =0;
    if(cnt_neg>k){
        
        while (k)
        {
            
            k--;
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
