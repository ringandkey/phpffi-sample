#include <DTL.hpp>
#include <vector>

extern "C" const char* gen_maze(char* work, int column_size, int row_size) {
    using namespace std;
	using shape_t = uint_fast8_t;
	vector<vector<shape_t>> matrix(row_size, vector<shape_t>(column_size));

	dtl::shape::MazeDig<shape_t>(1, 0).draw(matrix);
	for(int y=0; y<row_size; y++) {
		for(int x=0; x<column_size; x++) {
			work[y*column_size+x] = matrix[y][x] + 48;
		}
	} 
	return work;
}